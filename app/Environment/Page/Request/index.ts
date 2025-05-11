/**
 * Page
 *
 * Pages of your app
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2024 Kévin Zarshenas
 */

/**
 * Dependances
 */
const css = require("!!css-loader!sass-loader!./style.scss");
const html = require("./template.hbs");
import { M } from "@materializecss/materialize";
import {Crazypage, Crazyrequest, UtilityObjects} from "crazyphp";
require("./style.scss");

/**
 * Request
 *
 * Class for build your crazy page
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2024 Kévin Zarshenas
 */
export default class Request extends Crazypage {

    /** 
     * @param className:string 
     * Duplicate of the class name because build change name of class
     */
    public static readonly className:string = "Request";

    /** 
     * @param html:string 
     * Duplicate of the class name because build change name of class
     */
    public static readonly html = html;

    /** 
     * @param css:string 
     * Duplicate of the class name because build change name of class
     */
    public static readonly css = css;

    /**
     * Constructor
     */
    public constructor(options:LoaderPageOptions){

        /**
         * Parent constructor
         */
        super(options);

        /**
         * On Ready
         */
        this.onReady();

    }

    /**
     * On Ready
     *
     * @return void
     */
    public onReady = ():void => {

        console.log("hello Request");

        // Init Send Message Pack
        this._initSendMessagePack();

        // Init Send Message Json
        this._initSendMessageJson();

    }

    /** Private methods | Init
     ******************************************************
     */

    /**
     * Init Send Message Pack
     * 
     * @returns {void}
     */
    private _initSendMessagePack = ():void => {

        // Get el
        let el = document.getElementById("send-message-pack");

        // Init event
        el instanceof HTMLElement && el.addEventListener("click", this._eventSendMessagePack);

    }

    /**
     * Init Send Message Pack
     * 
     * @returns {void}
     */
    private _initSendMessageJson = ():void => {

        // Get el
        let el = document.getElementById("send-message-json");

        // Init event
        el instanceof HTMLElement && el.addEventListener("click", this._eventSendMessageJson);

    }

    /** Private methods | Events
     ******************************************************
     */

    /**
     * Event Send Message Pack
     * 
     * @param e 
     * @returns {void}
     */
    private _eventSendMessagePack = (e:MouseEvent):void => {

        // Get current source
        let currentTarget = e.currentTarget;

        // Check current target
        if(currentTarget instanceof HTMLElement){

            // Set object
            let object = this.MESSAGE;

            // Prepare request
            let request = new Crazyrequest(
                "/api/messagepack",
                {
                    method: "post",
                    cache: false,
                    requestType: "msgpack",
                }
            )

            // Send request
            request.fetch(object).then(this._thenSendMessage);

        }

    }

    /**
     * Event Send Message Json
     * 
     * @param e 
     * @returns {void}
     */
    private _eventSendMessageJson = (e:MouseEvent):void => {

        // Get current source
        let currentTarget = e.currentTarget;

        // Check current target
        if(currentTarget instanceof HTMLElement){

            // Set object
            let object = this.MESSAGE;

            // Prepare request
            let request = new Crazyrequest(
                "/api/messagepack",
                {
                    method: "post",
                    cache: false,
                }
            )

            // Send request
            request.fetch(object).then(this._thenSendMessage);

        }

    }

    /** Private methods | Then
     ******************************************************
     */

    /**
     * Then Send Message
     * 
     * @param value 
     */
    private _thenSendMessage = (value:any):void => {

        // Check result
        if(typeof value.results === "object" && UtilityObjects.equal(this.MESSAGE, value.results))

            // Message 
            M.toast({text: 'The request has been sent successfully !  ✅'})

        else

            // Message 
            M.toast({text: 'The request has not been sent successfully !  ❌'})

    }

    /** @vat object to test */
    public readonly MESSAGE = [
        {
          "_id": "681f0cf05cad0cc541b7ab91",
          "index": 0,
          "guid": "ad00ebe6-65f9-4d01-9ee1-2f0ca47db961",
          "isActive": true,
          "balance": "$2,754.11",
          "picture": "http://placehold.it/32x32",
          "age": 31,
          "eyeColor": "green",
          "name": "Beulah Forbes",
          "gender": "female",
          "company": "EMTRAK",
          "email": "beulahforbes@emtrak.com",
          "phone": "+1 (941) 540-3391",
          "address": "976 Madison Street, Sims, Palau, 2122",
          "about": "Veniam ex id reprehenderit incididunt in non officia magna est ea veniam commodo elit dolor. Amet sit ad deserunt minim reprehenderit. Sunt elit ullamco eu proident culpa. Cupidatat quis non irure magna occaecat laborum reprehenderit reprehenderit. Eiusmod est exercitation non eu elit laborum commodo ea aliquip nisi sint laborum aliquip eiusmod. Ipsum ut duis commodo eu anim excepteur. Qui exercitation culpa tempor eiusmod.\r\n",
          "registered": "2019-01-12T04:45:09 -01:00",
          "latitude": -31.413566,
          "longitude": 137.20627,
          "tags": [
            "qui",
            "dolor",
            "sit",
            "nostrud",
            "labore",
            "duis",
            "tempor"
          ],
          "friends": [
            {
              "id": 0,
              "name": "Antoinette Cain"
            },
            {
              "id": 1,
              "name": "Claudia Jordan"
            },
            {
              "id": 2,
              "name": "Perez Ray"
            }
          ],
          "greeting": "Hello, Beulah Forbes! You have 3 unread messages.",
          "favoriteFruit": "apple"
        },
        {
          "_id": "681f0cf0263bf9ed798f44eb",
          "index": 1,
          "guid": "8c033cc4-25d1-4635-b09e-aa2683cfc832",
          "isActive": false,
          "balance": "$1,450.48",
          "picture": "http://placehold.it/32x32",
          "age": 23,
          "eyeColor": "green",
          "name": "Sweet Hebert",
          "gender": "male",
          "company": "COSMETEX",
          "email": "sweethebert@cosmetex.com",
          "phone": "+1 (983) 513-2740",
          "address": "814 Clermont Avenue, Shrewsbury, North Carolina, 2638",
          "about": "Do laboris Lorem labore nulla aliqua deserunt commodo esse nulla exercitation mollit ea labore. Tempor ex proident cupidatat irure laboris id deserunt in exercitation quis in enim occaecat. Cillum nulla consectetur aute velit consequat irure aute officia et. Laboris eu nisi est eu reprehenderit est ea quis labore ad laboris ullamco non ipsum.\r\n",
          "registered": "2018-06-11T10:26:54 -02:00",
          "latitude": 61.574886,
          "longitude": -78.095119,
          "tags": [
            "amet",
            "minim",
            "voluptate",
            "excepteur",
            "adipisicing",
            "ut",
            "sunt"
          ],
          "friends": [
            {
              "id": 0,
              "name": "Patti Santos"
            },
            {
              "id": 1,
              "name": "Bernard Mason"
            },
            {
              "id": 2,
              "name": "Bishop Mcmahon"
            }
          ],
          "greeting": "Hello, Sweet Hebert! You have 6 unread messages.",
          "favoriteFruit": "banana"
        },
        {
          "_id": "681f0cf0aa9438e8decec2e5",
          "index": 2,
          "guid": "50b6e933-4499-4036-9ca1-e72371bfad59",
          "isActive": true,
          "balance": "$3,937.33",
          "picture": "http://placehold.it/32x32",
          "age": 33,
          "eyeColor": "blue",
          "name": "Peggy Alston",
          "gender": "female",
          "company": "CINESANCT",
          "email": "peggyalston@cinesanct.com",
          "phone": "+1 (984) 529-2586",
          "address": "781 Prospect Avenue, Salunga, Colorado, 9781",
          "about": "Adipisicing et ut magna ex eu qui nulla ea labore laborum voluptate nisi culpa quis. Aliquip ex sint cupidatat exercitation voluptate nostrud culpa est ad fugiat proident magna ex. Occaecat aliquip irure consectetur minim. Ut aute ad quis reprehenderit.\r\n",
          "registered": "2015-08-20T11:43:24 -02:00",
          "latitude": 8.561861,
          "longitude": -7.313579,
          "tags": [
            "commodo",
            "cillum",
            "culpa",
            "commodo",
            "sit",
            "et",
            "irure"
          ],
          "friends": [
            {
              "id": 0,
              "name": "Cline Dean"
            },
            {
              "id": 1,
              "name": "Montoya Riggs"
            },
            {
              "id": 2,
              "name": "Dina Mercado"
            }
          ],
          "greeting": "Hello, Peggy Alston! You have 6 unread messages.",
          "favoriteFruit": "strawberry"
        },
        {
          "_id": "681f0cf0182f2538e025c71e",
          "index": 3,
          "guid": "202ace7e-0136-42fe-b12e-3016b95265f2",
          "isActive": true,
          "balance": "$1,987.26",
          "picture": "http://placehold.it/32x32",
          "age": 31,
          "eyeColor": "blue",
          "name": "Hopkins Hancock",
          "gender": "male",
          "company": "PLAYCE",
          "email": "hopkinshancock@playce.com",
          "phone": "+1 (874) 588-3090",
          "address": "471 Neptune Avenue, Floris, Alabama, 4127",
          "about": "Eu adipisicing ut dolor est mollit velit ullamco cillum nostrud labore. Anim sunt ullamco ut ipsum ad velit est labore non exercitation. Duis excepteur laboris cupidatat pariatur ea aliqua id ipsum et tempor. Laboris aute commodo sit consequat cupidatat.\r\n",
          "registered": "2021-12-06T07:33:51 -01:00",
          "latitude": 29.114411,
          "longitude": 10.117735,
          "tags": [
            "aliquip",
            "elit",
            "proident",
            "quis",
            "consectetur",
            "exercitation",
            "mollit"
          ],
          "friends": [
            {
              "id": 0,
              "name": "Loraine Estes"
            },
            {
              "id": 1,
              "name": "Velma Cross"
            },
            {
              "id": 2,
              "name": "Fowler Stafford"
            }
          ],
          "greeting": "Hello, Hopkins Hancock! You have 1 unread messages.",
          "favoriteFruit": "apple"
        },
        {
          "_id": "681f0cf0c31223beac119a4e",
          "index": 4,
          "guid": "1e1d0750-dfc7-4011-8f00-437215124af8",
          "isActive": true,
          "balance": "$2,331.74",
          "picture": "http://placehold.it/32x32",
          "age": 26,
          "eyeColor": "green",
          "name": "Tommie Richardson",
          "gender": "female",
          "company": "VURBO",
          "email": "tommierichardson@vurbo.com",
          "phone": "+1 (889) 598-3207",
          "address": "401 Union Avenue, Osmond, Missouri, 5792",
          "about": "Adipisicing ut id adipisicing ut ad. Eu cillum in eu do cillum cupidatat nisi aute velit sint eu culpa velit. Incididunt anim aliquip do amet occaecat. Irure veniam nisi consequat enim nostrud enim do.\r\n",
          "registered": "2016-05-07T02:49:36 -02:00",
          "latitude": -29.812252,
          "longitude": -168.85738,
          "tags": [
            "irure",
            "sit",
            "est",
            "nostrud",
            "consequat",
            "minim",
            "est"
          ],
          "friends": [
            {
              "id": 0,
              "name": "Moreno Blair"
            },
            {
              "id": 1,
              "name": "Janice Knapp"
            },
            {
              "id": 2,
              "name": "Simpson May"
            }
          ],
          "greeting": "Hello, Tommie Richardson! You have 1 unread messages.",
          "favoriteFruit": "apple"
        },
        {
          "_id": "681f0cf0ba1277b8bbff6cfd",
          "index": 5,
          "guid": "af0a8c19-56e8-4fa7-9c2d-dcb661f2b32c",
          "isActive": false,
          "balance": "$2,196.92",
          "picture": "http://placehold.it/32x32",
          "age": 20,
          "eyeColor": "brown",
          "name": "Irma Bailey",
          "gender": "female",
          "company": "ENTALITY",
          "email": "irmabailey@entality.com",
          "phone": "+1 (921) 424-3615",
          "address": "604 Grove Place, Helen, Federated States Of Micronesia, 1684",
          "about": "Incididunt aliqua excepteur eu exercitation amet sunt sit dolor ipsum ad id. Laborum fugiat pariatur nulla cupidatat eu duis magna. Eu minim excepteur pariatur reprehenderit ea. Consequat elit exercitation in aliquip sint. Aute labore nulla eiusmod labore dolor dolor in culpa voluptate. Pariatur dolore exercitation ullamco qui velit ut nulla est laboris proident. Enim incididunt magna Lorem fugiat proident aute labore non excepteur nisi.\r\n",
          "registered": "2021-06-06T11:25:26 -02:00",
          "latitude": 54.425129,
          "longitude": -30.966073,
          "tags": [
            "excepteur",
            "proident",
            "magna",
            "enim",
            "do",
            "id",
            "enim"
          ],
          "friends": [
            {
              "id": 0,
              "name": "Claudette Bartlett"
            },
            {
              "id": 1,
              "name": "Shepherd Stuart"
            },
            {
              "id": 2,
              "name": "Burch Howell"
            }
          ],
          "greeting": "Hello, Irma Bailey! You have 9 unread messages.",
          "favoriteFruit": "apple"
        }
    ];

}

/**
 * Register current class
 */
window.Crazyobject.register(Request);