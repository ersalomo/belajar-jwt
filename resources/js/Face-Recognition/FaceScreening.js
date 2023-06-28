import * as faceapi from "face-api.js";
import {checkInVisitor, getVisitors} from "../fect-data";
import {MODEL_URL, SECOND} from "../utis";

class FaceScreening {
    constructor(elementVideo) {
        this.element = elementVideo
        this.displaySize = {
            width: this.element.width,
            height: this.element.height
        }
        this._faceApi = faceapi
    }

}
