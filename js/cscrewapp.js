var app = angular.module('cscrew', ['ui.router', 'ui.bootstrap', 'angularMoment']);
app.config(function ($stateProvider, $urlRouterProvider) {
    // Unmatched urls go to the homepage
    $urlRouterProvider.otherwise("/home");

    $stateProvider
        .state("home", {
            url: "/home",
            templateUrl: "templates/home.html"
        })
        .state("events", {
            url: "/events",
            templateUrl: "templates/events.html"
        })
        .state("members", {
            url: "/members",
            templateUrl: "templates/members.html"
        })
        .state("contact", {
            url: "/contact",
            templateUrl: "templates/contact.html"
        })
        .state("get-help", {
            url: "/get-help",
            templateUrl: "templates/get-help.html"
        })
        .state("profile", {
            url: "/profile",
            templateUrl: "templates/profile.html"
        })
        .state("admin", {
            abstract: true,
            url: "/admin",
            templateUrl: "templates/admin.html"
        })
        .state("admin.home", {
            url: "/home",
            templateUrl: "templates/admin/home.html"
        })
        .state("admin.helphours", {
            url: "/helphours",
            templateUrl: "templates/admin/helphours.html"
        })
        .state("admin.signinreasons", {
            url: "/signinreasons",
            templateUrl: "templates/admin/signinreasons.html"
        })
        .state("admin.userskills", {
            url: "/userskills",
            templateUrl: "templates/admin/userskills.html"
        });
});
