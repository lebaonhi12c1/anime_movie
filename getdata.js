
function getdata(){
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '1658ff66aamsh699b709b3f58e9cp117eb4jsnef6fcb8655ea',
            'X-RapidAPI-Host': 'tiktok-video-no-watermark2.p.rapidapi.com'
        }
    };
    
    fetch('https://tiktok-video-no-watermark2.p.rapidapi.com/feed/search?keywords=%E8%B8%8A%E3%81%A3%E3%81%A6%E3%81%BF%E3%81%9F&count=10&cursor=0', options)
        .then(response => response.json())
        .then(response => console.log(response))
        .catch(err => console.error(err));
}
getdata()