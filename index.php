<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<style type="text/css">
body{
    background-color: rgb(0, 178, 202); color: white;
    text-align: center;
    padding: 0;
    margin: 0;
    font-family: 'Open Sans', sans-serif;
    }

input:first-child{
    height: 75px;
    width: 450px;
    font-size: 40px;
    padding: 20px;
    color: slategray;
    float: left;
    font-family: 'Open Sans', sans-serif;
}

input:last-child{
    border: none;
background: white;
height: 75px;
float: left;
width: 75px;
color: rgb(0, 178, 202);
margin-left: .5em;
font-size: 20px;
}

input:last-child:hover{
    background: rgb(0, 178, 202);
    color: white;

}

.header-image{

    background:
      /* top, transparent red, faked with gradient */
      linear-gradient(
        rgba(0, 178, 202, 0.45),
        rgba(0, 178, 202, 0.45)
      ),
      /* bottom, image */
      url("/images/header.jpg");
    background-size: cover;
    height:100vh;
}

.header-image h1{
    font-size: 60px;
    padding-top: 4.25em;
    text-transform: uppercase;
    font-weight: 700;
    margin-bottom: 0;
}

.header-image p{
    margin-top: 0;
    margin-bottom: 4em;
}

.form-wrapper{
    margin:auto;
width: 550px;
}
</style>
<div class="header-image">
<h1>Diary of Two Bots</h1>
<p>Two chatbots will communicate with each other, but they are shy.</p>


    <h2>Get the Conversation Started</h2>
    <div class="form-wrapper">
        <form action="conversation.php" method="post">
            <input type="text" name="conversation" >

            <input type="submit" value="GO">
        </form>
    </div>
</div>
