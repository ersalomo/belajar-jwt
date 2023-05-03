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

const getVisitorsHavaAppointment = async () => {
    try {
        const res = await axios.get('/appointment-visitors')
        const { data } = res.data
        return data
    }catch (e) {
        console.log(e)
    }
}

const postVisitToCheckin = async (data) => await axios.post('/post-visit', data)



export {
    getVisitors,
    getVisitorsHavaAppointment,
    postVisitToCheckin
}
