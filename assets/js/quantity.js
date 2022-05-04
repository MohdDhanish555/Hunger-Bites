// document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

        //taking value to increment decrement input value
        var valueCount

        //plus button
        function plusButton(abc) {
            // var currPos = $position;
            // var currPos = <?php echo $position; ?>;
            // var currId = "quantity" + abc;
            valueCount = document.getElementById("quantity"+abc).value; // this is taking 1st one
            // valueCount = document.getElementById("quantity<?php echo $position; ?>").value;
            // console.log(valueCount);
            //input value increment by 1
            // document.getElementsByClassName("dish-qty");
            
            valueCount++;

            //setting increment input value
            document.getElementById("quantity"+abc).value = valueCount;
            
            if (valueCount > 1) {
                document.querySelector(".minus-btn"+abc).removeAttribute("disabled");
                // document.getElementById("").removeAttribute("disabled");
                document.querySelector(".minus-btn"+abc).classList.remove("disabled")
            }
        }
        // var pCount = 1;
        // document.querySelector(".plus-btn").addEventListener("click", function() {
        //     //getting value of input
        //     valueCount = document.getElementById("quantity"+pCount).value;

        //     //input value increment by 1
        //     valueCount++;

        //     //setting increment input value
        //     document.getElementById("quantity"+pCount).value = valueCount;

        //     if (valueCount > 1) {
        //         document.querySelector(".minus-btn").removeAttribute("disabled");
        //         document.querySelector(".minus-btn").classList.remove("disabled")
        //     }
        //     pCount = pCount + 1;
        //     console.log(pCount);

        // })



        //minus button

function minusButton(abc) {
    valueCount = document.getElementById("quantity"+abc).value;

            //input value increment by 1
            valueCount--;

            //setting increment input value
            document.getElementById("quantity"+abc).value = valueCount

            if (valueCount == 1) {
                document.querySelector(".minus-btn"+abc).setAttribute("disabled", "disabled")
            }
}

        // document.querySelector(".minus-btn").addEventListener("click", function() {
        //     //getting value of input
        //     valueCount = document.getElementById("quantity").value;

        //     //input value increment by 1
        //     valueCount--;

        //     //setting increment input value
        //     document.getElementById("quantity").value = valueCount

        //     if (valueCount == 1) {
        //         document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
        //     }
        // })