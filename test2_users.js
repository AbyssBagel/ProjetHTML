username='John2443';
password='IamcalledaSpellTable';
username2='John2443';
password2='IamcalledaSpellTable2';

function LoginUser(username,password) {
    console.log(username);
    console.log(password);
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    fetch('php/login_user.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
  }





function LoginUser2() {
  LoginUser(username,password);
  LoginUser(username2,password2);
  }

  function RegisterUser(username,password) {
    console.log(username);
    console.log(password);
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    fetch('php/register_user.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
  }

  function RegisterUser2() {
    RegisterUser(username,password);
    RegisterUser(username2,password2);
    }