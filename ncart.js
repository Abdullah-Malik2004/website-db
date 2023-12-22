let items = ['assissin', 'fc5', 'jedi', 'wwz', 'bro', 'faith', 'hallo', 'movN', 'quran', 'bussi', 'head', 'winter', 'hoodie', 'pink', 'black', 'white', 'laptop', 'phone', 'board', 'watch', 'burger', 'chick', 'fries', 'wrap'];
var totalValue = 0, total;
var asTotal = 79.99, fTotal = 19.99, wTotal = 39.99, jTotal = 49.71;


function reload() 
{
    var existingDiv = document.querySelector('.itemPicture');
    
    
    if(localStorage.getItem('total') == null)
        localStorage.setItem('total', '0');



    for (var i = 0; i < items.length; i++) 
    {
        var divelement = document.createElement('div');
        var para = document.createElement('p');
        var imgElement = document.createElement('img');
        var delicon = document.createElement('i');

        delicon.classList.add('fas', 'fa-trash');
        //console.log(para)
        
        //para.innerHTML = 'Star Wars&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$39.99';'This is the text content for the paragraph.';
        if(items[i] == 'assissin')
            setPriceAndQuantity('assissin', "Assassin's Creed", 79.99, para)

        else if(items[i] == 'fc5')
            setPriceAndQuantity('assissin', "Far Cry 5", fTotal, para);

        else if(items[i] == 'jedi') 
            setPriceAndQuantity('assissin', "Star Wars", jTotal, para);
        
        else if(items[i] == 'wwz') 
            setPriceAndQuantity('assissin', "World War Z", wTotal, para); 
            
        else if (items[i] == 'quran') 
            setPriceAndQuantity(items[i], 'Quran Karim', 2.99, para);

        else if (items[i] == 'bussi') 
            setPriceAndQuantity(items[i], 'How to Bussiness', 3.49, para);
        
        else if (items[i] == 'head') 
            setPriceAndQuantity(items[i], 'Head Lines', 4.98, para);
        
        else if (items[i] == 'winter') 
            setPriceAndQuantity(items[i], 'Winter Winter', 8.99, para);

        else if (items[i] == 'hoodie') 
            setPriceAndQuantity(items[i], 'Hoodie', 9.99, para);
        
        else if (items[i] == 'pink') 
            setPriceAndQuantity(items[i], 'Pinky Shirt', 3.49, para);
        
        else if (items[i] == 'black') 
            setPriceAndQuantity(items[i], 'Black Shirt', 4.98, para);
        
        else if (items[i] == 'white') 
            setPriceAndQuantity(items[i], 'White Shirt', 8.99, para);
                
        else if (items[i] == 'bro') 
            setPriceAndQuantity(items[i], 'Brother Motel', 1.99, para);

        else if (items[i] == 'faith') 
            setPriceAndQuantity(items[i], 'FAITH', 1.49, para);

        else if (items[i] == 'hallo') 
            setPriceAndQuantity(items[i], 'Spooky Spooky', 1.99, para);

        else if (items[i] == 'movN') 
            setPriceAndQuantity(items[i], 'Movie Night', 1.98, para);

        else if (items[i] == 'board') 
            setPriceAndQuantity(items[i], 'Circuit Board', 12.99, para);

        else if (items[i] == 'watch') 
            setPriceAndQuantity(items[i], 'Smart Watch', 15.99, para);
        
        else if (items[i] == 'laptop') 
            setPriceAndQuantity(items[i], 'Laptop', 12.99, para);

        else if (items[i] == 'phone') 
            setPriceAndQuantity(items[i], 'Head Phone', 15.99, para);

        else if (items[i] == 'burger') 
            setPriceAndQuantity(items[i], 'Chicken Burger', 6.49, para);

        else if (items[i] == 'chick') 
            setPriceAndQuantity(items[i], 'Fried Chicken', 8.99, para);

        else if (items[i] == 'fries') 
            setPriceAndQuantity(items[i], 'Fresh Fries', 3.99, para);

        else if (items[i] == 'wrap') 
            setPriceAndQuantity(items[i], 'Shwarma Wrap', 7.49, para);

        
   
        

        var imagePath = localStorage.getItem(items[i]);
        // Check if imagePath is not null before creating the img element
        if (imagePath !== null) 
        {
            imgElement.src = imagePath;
    
            imgElement.onload = function () 
            {
                imgElement.onerror = function () 
                {
                    this.remove(); // Remove the img element if the image fails to load
                };
            }
    
    
            
            // Check if the div exists before appending the image
            if (existingDiv) 
            {
                console.log("This is : "+divelement.innerHTML);
                divelement.style.display = 'flex';
                divelement.style.justifyContent = 'space-around';
                para.style.paddingTop="150px";
                delicon.style.paddingTop="150px";
                imgElement.style.paddingBottom="40px";
                imgElement.style.paddingRight="150px";

                if(i > 3)
                {
                    imgElement.style.marginLeft="30px";
                    imgElement.style.marginTop="-20px";
                    imgElement.style.height = '260' + 'px';
                    imgElement.style.width = '150' + 'px';
                }
                if(i > 15)
                {
                    imgElement.style.marginTop="20px";
                    imgElement.style.height = '170' + 'px';
                    imgElement.style.width = '240' + 'px';
                }
                existingDiv.appendChild(divelement);//adding div to existing div in cartphp
                console.log(existingDiv);
                divelement.appendChild(imgElement);
                divelement.appendChild(para);
                divelement.appendChild(delicon);

                
                (function (currentGameId) 
                {
                    delicon.addEventListener('click', function () 
                    {
                        var parentDiv = this.parentElement;
                        var addedStatus = currentGameId + 'a';
                        
                        parentDiv.remove();
                        console.log(currentGameId);

                        
                        localStorage.removeItem(currentGameId);
                        localStorage.removeItem(addedStatus);

                        console.log('Removed div with gameId: ' + currentGameId);
                    });
                })(items[i]);
            } 
        }
    }  
}



function setPriceAndQuantity(itemId, itemName, price, paraElement)
{
    var endTotal = document.createElement('p');
    endTotal.id = 'amount';

    var gCheck = false; //for the quantity in div purposes

    var getQuantity = itemId + "Quantity";
    var quantity = localStorage.getItem(getQuantity);


    //console.log(quantity)
    //console.log(getQuantity)

    let item = ['assissin', 'fc5', 'jedi', 'wwz', 'bro', 'faith', 'hallo', 'movN'];
    for(var i = 0; i < 8; i++)
        if(itemId == item[i])
        {
            quantity = 1;
            gCheck = true;
        }

    var totalPrice = price * quantity;
    endTotal.innerHTML = totalPrice.toFixed(2);

    //totalAmount += totalPrice;

    if(gCheck)
        paraElement.innerHTML = itemName + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$';
    else   
        paraElement.innerHTML = itemName + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+quantity+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$';

    paraElement.style.display = 'flex'
    paraElement.appendChild(endTotal);

    //calculateTotal();
}
