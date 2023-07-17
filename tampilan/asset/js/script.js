  // Function to toggle between Dark Mode and Light Mode
  const toggleMode = () => {
    const body = document.body;
    const toggleBtn = document.querySelector(".toggle-btn");
    const toggleIcon = document.querySelector("#toggle-icon");
    const  sidebar = document.querySelector(".sidebar");

    body.classList.toggle("dark-mode");
    sidebar.classList.toggle("dark-sidebar");

    if (body.classList.contains("dark-mode")) {
      toggleIcon.classList.remove("fa-toggle-on");
      toggleIcon.classList.add("fa-toggle-off");
      toggleBtn.classList.add("on");
    } else {
      toggleIcon.classList.remove("fa-toggle-off");
      toggleIcon.classList.add("fa-toggle-on");
      toggleBtn.classList.remove("on");
    }
    if(!sidebar.classList.contains("dark-sidebar")) {
      sidebar.classList.add("dark-sidebar");
    }
  };

  