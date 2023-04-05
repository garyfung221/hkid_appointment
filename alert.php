
<link rel="stylesheet" href="styles/alert.css" type="text/css">


<div class="websiteAlert" id="websiteAlert">
      <h1 class="alert-heading">Alert</h1>
      <p class="alert-text">Please note that <span>this website is not an official government website</span>, and is only intended <span>for educational purposes</span> and use in an <span>IT assignment.</span> Therefore, we kindly request that you <span>refrain <span class="dont">(DON'T)</span> from inputting any real data.</span></p>
        <button id="accept">OK</button>
    </div>

<script>
    const alert = document.getElementById('websiteAlert')

    
    document.getElementById('accept').addEventListener("click",()=>{
            alert.style.display = "none"
    })

</script>