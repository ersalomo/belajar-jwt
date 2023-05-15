import axios from "axios";

const getVisitors = async () => {
    try {
        const res = await axios.get('/visitors')
        const { data } = res.data
        return data
    }catch (err){
        console.log(err)
    }
}

const getVisitorsHaveAppointment = async () => {
    try {
        const res = await axios.get('/oa/appointment-visitors')
        const { data } = res.data
        return data
    }catch (e) {
        console.log(e)
    }
}

const postVisitToCheckin = async (data) => axios.post('/oa/post-visit', data)
const checkInVisit = async (id, data) => axios.post(`/oa/checkin-visit/${id}`, data)



export {
    getVisitors,
    getVisitorsHaveAppointment,
    postVisitToCheckin,
    checkInVisit
}
