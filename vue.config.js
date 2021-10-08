// vue.config.js
module.exports = {
  // options...
  devServer: {
    port: 3306,
    proxy: 'http://localhost:8000/'
  }
}