let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    profile.classList.toggle('active');
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#users-btn').onclick = () =>{
    profile.classList.toggle('active');
    navbar.classList.remove('active');
}

window.onscroll = () =>{
    profile.classList.remove('active');
    navbar.classList.remove('active');
}





  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', function () {
      sidebar.classList.toggle('active');
    });
  });

