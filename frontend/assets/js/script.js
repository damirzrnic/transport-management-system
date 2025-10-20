var app = $.spapp({
  defaultView: "viewlogin",
  templateDir: "views/"
});

app.route({ view: "viewhero", load: "hero.html" });
app.route({ view: "viewlogin", load: "login.html" });
app.route({ view: "viewregister", load: "register.html" });
app.route({ view: "viewcompany", load: "addcompany.html" });
app.route({ view: "viewtracking", load: "trackingpage.html" });
app.route({ view: "viewcompleted", load: "completedloads.html" });
app.route({ view: "viewemployees", load: "employees.html" });
app.route({ view: "viewquote", load: "quotepage.html" });

app.run();
