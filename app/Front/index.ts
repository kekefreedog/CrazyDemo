/**
 * Index
 *
 * Index of the front script
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2024 Kévin Zarshenas
 */

/** Crazy Object
 ******************************************************
 */
 import {Crazyobject, Crazylanguage} from "crazyphp";

 /** Styles
  ******************************************************
  */
 require("./style");
 
 /** JS Libraires
  ******************************************************
  */
 require("./library");
 
 /** TS|JS Libraires
  ******************************************************
  */
 
/** Crazy GlobalWebcomponents
 ******************************************************
 * Declare only compenent to load on all page of your app
 */
import LoadingScreenBtn from "./../Environment/Component/LoadingScreenBtn";
import LinearProgress from "../Environment/Component/LinearProgress";
import RegularBtn from "./../Environment/Component/RegularBtn";
let globalComponentsCollection = {
    "loading-screen-btn": LoadingScreenBtn,
    //"full-screen-container": FullScreenContainer,
    "linear-progress": LinearProgress,
    "regular-btn": RegularBtn
};
 
/** Crazy Global Partials
 ******************************************************
 * Declare only compenent to load on all page of your app
 */
import PreloaderLinearIndeterminate from "../Environment/Partials/PreloaderLinearIndeterminate";
import Navigation from "../Environment/Partials/Navigation";
import hello from "../Environment/Partials/Hello";
import Form from "../Environment/Partials/Form";
let globalPartials = {
   "preloader_linear_indeterminate": PreloaderLinearIndeterminate,
   "navigation": Navigation,
   "hello": hello,
   "form": Form,
};

/** Actions
 ******************************************************
 */

/** @var Crazyobject:Crazyobject */
window.Crazyobject = new Crazyobject({
    globalComponentsCollection: globalComponentsCollection,     
    globalStateCollection: {
       "language": Crazylanguage.getNavigatorLanguage()
    },
    globalPartials: globalPartials
});