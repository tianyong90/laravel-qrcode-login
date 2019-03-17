import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Echo from 'laravel-echo'
import io from 'socket.io-client'

Vue.use(VueAxios, axios)
window.io = io

let EchoInstance = new Echo({
  broadcaster: 'socket.io',
  host: window.location.hostname + ':6001',
})

Vue.component('example-component',
  require('./components/ExampleComponent.vue').default)

// axios 请求发送前处理
axios.interceptors.request.use(
  axiosConfig => {
    const token = window.localStorage.getItem('my_token')
    axiosConfig.headers.Authorization = 'Bearer ' + token

    return axiosConfig
  },
  error => {
    return Promise.reject(error)
  },
)

// axios 得到响应后处理
axios.interceptors.response.use(
  response => {
    const newToken = response.headers.authorization
    if (newToken) {
      window.localStorage.setItem(config.authTokenKey,
        newToken.replace('Bearer ', ''))
    }

    return response
  },
  error => {
    if (error.response) {
      const newToken = error.response.headers.authorization
      if (newToken) {
        window.localStorage.setItem(config.userKey,
          newToken.replace('bearer ', ''))
      }
    } else {
      // 请求超时提示
      if (error.code === 'ECONNABORTED') {
        alert('网络超时，请重试')
      }
    }

    return Promise.reject(error)
  },
)

const app = new Vue({
  el: '#app',

  data () {
    return {
      token: localStorage.getItem('my_token'),
    }
  },

  mounted () {
    EchoInstance.channel('scan-login').listen('WechatScanLogin', e => {
      console.log(e.token)
      this.token = e.token
      localStorage.setItem('my_token', this.token)

      console.log('login')
    })

    axios.get('api/current-user').then(response => {
      console.log(response.data)
    })
  },

  methods: {
    refreshQrcode () {

    },
  },
})
