

const submit = () => {
    (
        async () => {
            const res = await fetch("http://localhost:8000/api/runs", {
                method: "GET",
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                }
            });
            const content = await res.json();

            console.log(content);
        }
    )();
}   