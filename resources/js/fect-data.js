import axios from "axios";



// const base_url = process.env.APP_URL;

export const getVisitors = async () => axios.get(`/oa/get-visitations`).catch(e=>console.log(e))

export const checkInVisitor = async (id) => axios.post(`/oa/checkin-visit/${id}`).catch((e=>console.log(e)))


export const faceScreening = (data = {}) => {}


