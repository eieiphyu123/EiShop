$(document).ready(function(){
    count();
    getData();
     // Add to Cart   
    $('.addToCart').click(function(){
        // alert('hello');
        let item_id=$(this).data('id');
        let item_name=$(this).data('name');
        let item_price=$(this).data('price');
        let item_discount=$(this).data('discount');
        // console.log(item_id,item_name,item_price);
        let itemObj={
            id: item_id,
            name: item_name,
            price: item_price,
            discount: item_discount,
            qty:1
        }
        
        let itemString=localStorage.getItem('shopItems');
        let itemArray;
        if(itemString==null){
            itemArray=[];
        }else{
            itemArray=JSON.parse(itemString);
        }

        let status=false; // item ၁ခုကို ၂ခါ click လျင် qty ကိုပဲ count ၁ တို့းမယ်
        $.each(itemArray, function(i,v){
            if(item_id==v.id){
                v.qty++;
                status=true;
            }
        })
        if(status==false){
            itemArray.push(itemObj);
        }

        let itemData=JSON.stringify(itemArray);
        localStorage.setItem('shopItems',itemData);

        count();
    })
    
    //count funtion
    function count(){
        let itemString=localStorage.getItem('shopItems');
        // console.log(itemString);
        if(itemString){
            let itemArray=JSON.parse(itemString);
            console.log(itemArray.length);
            if(itemArray!=null){
                //item count
                // $('#count_item').text(itemArray.length);
                //count total qty
                let totalQty=0;
                $.each(itemArray, function(i,v){
                    totalQty += Number(v.qty);
                })
                $('#count_item').text(totalQty);
            }
        }
    }

    function getData(){
        let itemString=localStorage.getItem('shopItems');
        let itemArray;

        if(itemString){           
            itemArray=JSON.parse(itemString);
           
            let data='';
            let n=1;
            let total=0;
            $.each(itemArray, function(i,v){
                data += `<tr>
                            <td>${n++}</td>
                            <td>${v.name}</td>
                            <td>${v.price}</td>
                            <td>${v.discount}</td>
                            <td>
                            <button class="min" data-index="${i}"> - </button>
                            ${v.qty}
                            <button class="max" data-index="${i}"> + </button>
                            </td>
                            <td>${v.qty * v.price} MMk </td>
                        </tr>`;
                total+=v.qty*v.price;
            })
            data += `<tr>
                        <td colspan="4">Total</td>
                        <td>${total} MMK</td>
                   </tr>` ;  
                   $('#tbody').html(data);
        }
    }

    $('#tbody').on('click','.min',function(){
        let index=$(this).data('index');
        // alert(index);
        
        let itemString=localStorage.getItem('shopItems');
        if(itemString){
            itemArray=JSON.parse(itemString);
            $.each(itemArray, function(i,v){
                if(index==i){
                    v.qty--;
                    if(v.qty==0){
                        itemArray.splice(index,1);
                    }
                }
                let itemData=JSON.stringify(itemArray);
                localStorage.setItem('shopItems',itemData);
                getData();
                count();
            })            
        }
    })

    $('#tbody').on('click','.max',function(){
        let index=$(this).data('index');
        // alert(index);
        
        let itemString=localStorage.getItem('shopItems');
        if(itemString){
            itemArray=JSON.parse(itemString);
            $.each(itemArray, function(i,v){
                if(index==i){
                    v.qty++;
                }
                let itemData=JSON.stringify(itemArray);
                localStorage.setItem('shopItems',itemData);
                getData();
                count();
            })            
        }
    })

    $('#order').click(function(){
        let ans = confirm("Are you sure order?");
        if(ans){
            localStorage.clear();
            window.location.href='index.html';
        }
    })
       
});