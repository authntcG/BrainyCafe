//experimental sidebar color js
function sidebarColorCustom(a) {
    var parent = document.querySelector(".nav-link.active");
    var color = a;
  
    if (parent.classList.contains('bg-gradient-primary')) {
      parent.classList.remove('bg-gradient-primary');
    }
    if (parent.classList.contains('bg-gradient-dark')) {
      parent.classList.remove('bg-gradient-dark');
    }
    if (parent.classList.contains('bg-gradient-info')) {
      parent.classList.remove('bg-gradient-info');
    }
    if (parent.classList.contains('bg-gradient-success')) {
      parent.classList.remove('bg-gradient-success');
    }
    if (parent.classList.contains('bg-gradient-warning')) {
      parent.classList.remove('bg-gradient-warning');
    }
    if (parent.classList.contains('bg-gradient-danger')) {
      parent.classList.remove('bg-gradient-danger');
    }
    parent.classList.add('bg-gradient-' + color);
  }

  //experimental sidebar type js
  function sidebarTypeCustom(a) {
    var parent = a.parentElement.children;
    var color = a;
    var body = document.querySelector("body");
    var bodyWhite = document.querySelector("body:not(.dark-version)");
    var bodyDark = body.classList.contains('dark-version');
  
    var colors = ["bg-gradient-dark","bg-transparent","bg-white"];
  
    var sidebar = document.querySelector('.sidenav');
  
    for (var i = 0; i < colors.length; i++) {
      sidebar.classList.remove(colors[i]);
    }
  
    sidebar.classList.add(color);
  
  
    // Remove text-white/text-dark classes
    if (color == 'bg-transparent' || color == 'bg-white') {
      var textWhites = document.querySelectorAll('.sidenav .text-white');
      for (let i = 0; i < textWhites.length; i++) {
        textWhites[i].classList.remove('text-white');
        textWhites[i].classList.add('text-dark');
      }
    } else {
      var textDarks = document.querySelectorAll('.sidenav .text-dark');
      for (let i = 0; i < textDarks.length; i++) {
        textDarks[i].classList.add('text-white');
        textDarks[i].classList.remove('text-dark');
      }
    }
  
    if (color == 'bg-transparent' && bodyDark) {
      var textDarks = document.querySelectorAll('.navbar-brand .text-dark');
      for (let i = 0; i < textDarks.length; i++) {
        textDarks[i].classList.add('text-white');
        textDarks[i].classList.remove('text-dark');
      }
    }
  
    // Remove logo-white/logo-dark
  
    if ((color == 'bg-transparent' || color == 'bg-white') && bodyWhite) {
      var navbarBrand = document.querySelector('.navbar-brand-img');
      var navbarBrandImg = navbarBrand.src;
  
      if (navbarBrandImg.includes('logo-ct.png')) {
        var navbarBrandImgNew = navbarBrandImg.replace("logo-ct", "logo-ct-dark");
        navbarBrand.src = navbarBrandImgNew;
      }
    } else {
      var navbarBrand = document.querySelector('.navbar-brand-img');
      var navbarBrandImg = navbarBrand.src;
      if (navbarBrandImg.includes('logo-ct-dark.png')) {
        var navbarBrandImgNew = navbarBrandImg.replace("logo-ct-dark", "logo-ct");
        navbarBrand.src = navbarBrandImgNew;
      }
    }
  
    if (color == 'bg-white' && bodyDark) {
      var navbarBrand = document.querySelector('.navbar-brand-img');
      var navbarBrandImg = navbarBrand.src;
  
      if (navbarBrandImg.includes('logo-ct.png')) {
        var navbarBrandImgNew = navbarBrandImg.replace("logo-ct", "logo-ct-dark");
        navbarBrand.src = navbarBrandImgNew;
      }
    }
  }