class Currency {

    static all() {
        return axios.get('/currency').then(({data}) => data);
    }

    static limit(limit, page) {
        return axios.get(`/currency?limit=${limit}&page=${page}`).then(({data}) => data);
    }

}

export default Currency;
