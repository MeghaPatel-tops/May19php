function getCounty(){
    $.ajax({
        method:"post",
        url:"http://localhost/May19php/Corephp/lect-12(Web%20service)/temp.php?countryapi",
        success:function(data){
            prepareCountry(data);
            
        },
        error:function(error){
            console.log(error);
        }
    })
}

function prepareCountry(response) {
    try {
        // 1. Trim whitespace
        // 2. Remove BOM (Byte Order Mark)
        // 3. Remove anything after closing ]
        let cleanResponse = response.replace(/^\uFEFF/, '').trim();

        // Optional: Slice at correct closing position
        let lastBracketIndex = cleanResponse.lastIndexOf(']');
        if (lastBracketIndex !== -1) {
            cleanResponse = cleanResponse.slice(0, lastBracketIndex + 1);
        }

        const countries = JSON.parse(cleanResponse);
        console.log("Parsed country data:", countries);
    } catch (err) {
        console.error("Failed to parse JSON:", err);
    }
}



window.onload = getCounty();