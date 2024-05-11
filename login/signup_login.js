function signup() {
    event.preventDefault();
    var userName = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var objUser = {
        userName: userName,
        email: email,
        password: password,
        confirmPassword: confirmPassword
    };
    if (objUser.password === objUser.confirmPassword) {
        var json = JSON.stringify(objUser);
        localStorage.setItem(email, json);
        alert("Đăng Ký thành công");
        window.location.href="logIn.html"
    } else {
        alert("Password Not confirm");
    }
}

function login() {
    event.preventDefault();
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var loginUser = localStorage.getItem(email);
    var data = JSON.parse(loginUser);
    if (!loginUser) {
        alert("Không tìm thấy tài khoản vui lòng kiểm tra lại");
    } else {
        if (email === data.email && password === data.password) {
            alert("Đăng Nhập thành công");
            window.location.href="Project_webseller/buyer.html";
            
        } else {
            alert("Tài khoản hoặc mật khẩu không hợp lệ");
        }
    }
}
