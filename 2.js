function usernameCheck(username) {
    if (username.match(/^(?=.*[a-z])(?=.*[@])[@][a-z]{3,13}$/)) {
      return true
    }
    return false
  }
  
  function passwordCheck(password) {
    if (password.match(/^(?=.*[0-9])[0-9]{6}$/)) {
      return true
    }
    return false
  }

//username check
console.log(usernameCheck("@koders"))
console.log(usernameCheck("@programmerhandal"))

//password check
console.log(passwordCheck("212223"))
console.log(passwordCheck("2!2a3B"))
