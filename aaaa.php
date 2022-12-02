<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
        .button.icon
        {
            background-position: 10px 50%;
            background-repeat: no-repeat;
            transition: 0.5s;
            padding: 8px 20px 8px 40px;
        }
        
        .btn-primary-soft {
        background-color: #D8EBFA;
        /* border: 1px solid rgba(57,108,240,0.1); */
        color: #1969AA;
        font-weight: 500;
        font-size: 16px;
        border: none;
        /* box-shadow: 0 3px 5px 0 rgb(57 108 240 / 30%); */
        padding-left: 40px;
        padding-top: 12px;
        padding-bottom: 12px;
        margin-top: 10px;
        }


        .btn {
    cursor: pointer;
    padding: 8px 20px;
    outline: none;
    text-decoration: none;
    font-size: 15px;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    border-radius: 5px;
    font-family: 'Open Sans', sans-serif;
}

    </style>
</head>
<body>
    
<td>
<div style="display:flex;justify-content: center;">
    <a href="?action=edit&id=' . $docid . '&error=0" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-edit" ><font class="tn-in-text">Editar</font></button></a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="?action=view&id=' . $docid . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view" ><font class="tn-in-text">Ver</font></button></a>
                                       &nbsp;&nbsp;&nbsp;
                                       <a href="?action=drop&id=' . $docid . '&name=' . $name . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"><font class="tn-in-text">Remove</font></button></a>
                                        </div>
                                        </td>

                                        
</body>
</html>


