export default class Storage {
    getStorageData() {
        axios.get("/api/high_score/" + 9).then((res) => {
            localStorage.setItem(
                "flappyBirdData",
                JSON.stringify({ bestScore: res.data.data.high_score })
            );
        });
        return JSON.parse(localStorage.getItem("flappyBirdData"));
    }

    setStorageData(data) {
        var high_score = Object.values(data).shift();

        axios
            .post("/api/game", {
                member_id: 9,
                score: high_score,
            })
            .then((res) => {
                localStorage.setItem(
                    "flappyBirdData",
                    JSON.stringify({ bestScore: res.data.high_score })
                );
            })
            .catch((err) => {
                console.log(err);
            });

        localStorage.setItem("flappyBirdData", data);
    }
}
