/**
 * Linear Progress
 *
 * Linear Progress Bar
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2023 Kévin Zarshenas
 */

/**
 * Dependances
 */
const StyleCompilated:CrazyelementStyle = require("!!css-loader!sass-loader!./style.scss");
const TemplateCompilated:CallableFunction = require("./template.hbs");
import { Crazycomponent, Crazyurl } from "crazyphp";

/**
 * Regular Button
 *
 * Webcomponent for Regular Button
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2023 Kévin Zarshenas
 */
export default class LinearProgress extends Crazycomponent {

   /** Parameters
   ******************************************************
   */

   /** @var properties Propoerties of the current component */
   public properties:Record<string,CrazycomponentProperty> = {
        value: {
            value: 0,
            type: "number"
        },
        max: {
            value: 1,
            type: "number"
        },
        indeterminate: {
            value: false,
            type: "bool"
        },
        "color-primary": {
            type: "string"
        },
        "color-secondary": {
            type: "string",
        },
   };

   /**
    * Observable Attributes
    */
   static get observedAttributes() {
      return ["value", "max", "indeterminate", "color-primary", "color-secondary"];
   }

   /**
   * Constructor
   */
   constructor(){

      // Call parent constructor
      super();

      // Set Content
      this.setHtmlAndCss(
         TemplateCompilated,
         StyleCompilated
      );

   }

   /**
    * Post Render
    * 
    * Event Post Render
    * 
    @return void
    */
   public postRender():void {

   }

}