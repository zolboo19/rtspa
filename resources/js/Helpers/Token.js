class Token{
    isValid(token){
        const payload = this.payload(token)
        //console.log(payload)
        if(payload){
            return payload.iss == "http://localhost:8000/api/auth/login" ||
            "http://localhost:8000/api/auth/signup" ? true : false
        }
    }

    payload(token){
        const payload = token.split('.')[1]
        //console.log(token)
        return this.decode(payload)
    }

    decode(payload){
        //console.log(JSON.parse(atob(payload)))
        if(this.isBase64(payload)){
            return JSON.parse(atob(payload))
        }
    }

    isBase64(str){
        //console.log(btoa(atob(str)))
        try{
            return btoa(atob(str)).replace(/=/,"") == str
        }
        catch(err){
            return false
        }
    }
}
export default Token = new Token();
