

const submit = () => {
    (
        async () => {
            const rawResponse = await fetch("http://localhost:8000/api/runs", {
                method: "POST",
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                }
            });
            const content = await rawResponse.json();

            console.log(content);
        }
    )();
}   