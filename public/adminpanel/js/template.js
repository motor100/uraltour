// Show/hidden user menu 
const contentHeaderUser = document.querySelector('.content-header .user'),
      userMenu = document.querySelector('.user-menu'),
      sidebarOverlay = document.querySelector('#sidebar-overlay');

contentHeaderUser.onclick = showUserMenu;

function showUserMenu() {
  userMenu.classList.toggle('active');
  sidebarOverlay.classList.add('active');
  return false;
}


// Nav menu item set active
const asideItemLink = document.querySelectorAll('.aside .item-link');

if (typeof(menuItem) != "undefined" && menuItem !== null) {
  asideItemLink[menuItem].classList.add('active');
}

// Aside active (left nav menu)
const contentHeaderBurger = document.querySelector('.content-header .burger'),
      aside = document.querySelector('.aside');
      

contentHeaderBurger.onclick = showAside;
sidebarOverlay.onclick = closeMenu;

function showAside() {
  aside.classList.add('active');
  sidebarOverlay.classList.add('active');
  return false;
}

function closeMenu() {
  aside.classList.remove('active');
  userMenu.classList.remove('active');
  sidebarOverlay.classList.remove('active');
  return false;
}

