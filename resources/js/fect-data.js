import axios from "axios";


export const getVisitors = async () => axios.get(`/oa/get-visitations`).catch(e => console.log(e))

export const checkInVisitor = async (id) => axios.post(`/oa/checkin-visit/${id}`).catch((e => console.log(e)))

export const faceScreening = (data) => axios.post("/oa/face-screening", data).catch(e => console.log(e))


