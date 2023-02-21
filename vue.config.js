module.exports = {
    devServer: {
      proxy: {
        "https://app.rakuten.co.jp": {
          target: "http://127.0.0.1:8000",
        }
      }
    }
  };