import Route from "./Route.js";

//Définir ici vos routes
export const allRoutes = [
    new Route("/", "Home", "/pages/home.html"),
    new Route("/CarrierLogin", "Carrier´s Login", "/pages/carrierLogin.html"),];

//Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "Carry Me";