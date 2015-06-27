var app = angular.module('cscrew', ['ui.router', 'ui.bootstrap', 'angularMoment']);
app.config(function ($stateProvider, $urlRouterProvider) {
    // Unmatched urls go to the homepage
    $urlRouterProvider.otherwise("/home");

    $stateProvider
        .state("home", {
            url: "/home",
            templateUrl: "templates/home.html"
        })
        .state("projects", {
            url: "/projects",
            templateUrl: "templates/projects.html"
        })
        .state("calendar", {
            url: "/calendar",
            templateUrl: "templates/calendar.html"
        })
        .state("members", {
            url: "/members",
            templateUrl: "templates/members.html"
        })
        .state("contact", {
            url: "/contact",
            templateUrl: "templates/contact.html"
        })
        .state("news", {
            url: "/news",
            templateUrl: "templates/news.html"
        })
        .state("get-help", {
            url: "/get-help",
            templateUrl: "templates/get-help.html"
        })
        .state("profile", {
            url: "/profile",
            templateUrl: "templates/profile.html"
        });
});
