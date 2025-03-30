import './style.css'


function loadComponent(id, file) {
  fetch(file)
    .then(response => {
      if (!response.ok) {
        throw new Error(`Failed to load ${file}: ${response.status}`);
      }
      return response.text();
    })
    .then(data => {
      document.getElementById(id).innerHTML = data;
    })
    .catch(error => console.error(error));
}

document.addEventListener("DOMContentLoaded", () => {
  loadComponent("navbar", "/src/components/navbar.html");  
  loadComponent("footer", "/src/components/footer.html");  
  loadComponent("home-slider", "/src/components/home-slider.html");
  loadComponent("home-about", "/src/components/home-about.html");
  loadComponent("home-services-section", "/src/components/home-services-section.html");
  loadComponent("home-become-an-agent", "/src/components/home-become-an-agent.html");
});
