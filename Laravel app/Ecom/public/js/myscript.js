async function getProductDataJs(){

     let result = await fetch('http://127.0.0.1:8000/getproduct');
     let data = await result.json();
     
     prepareProductCatalog(data);
     
}

async function getProductByCat(cid){
    let url;
    if(cid==0){
         url = 'http://127.0.0.1:8000/getproduct/';
    }
    else{
        url = 'http://127.0.0.1:8000/getproduct/'+cid
    }
    let result = await fetch(url);
     let data = await result.json();
     console.log(data);
     
     
     prepareProductCatalog(data);
}

function prepareProductCatalog(data){

    let str="";
    data.map((index)=>{
        str+=`
             <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card text-black">
          <i class="fab fa-apple fa-lg pt-3 pb-1 p-3"></i>
          <img style="height:300px" src="http://127.0.0.1:8000/uploads/product/${index.image}"
            class="card-img-top" alt="Apple Computer"  />
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">${index.pname}</h5>
             
            </div>
            <div>
             
              
              
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>Total:${index.price}</span>
              <a href="/addtocart/${index.pid}" class="btn btn-dark">AddToCart</a>
            </div>
          </div>
        </div>
      </div>
        `
    });
    document.getElementById('prodata').innerHTML = str;
}

window.onload=getProductDataJs();