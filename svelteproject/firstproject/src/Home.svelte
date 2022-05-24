<script>
   //import
   import {onMount} from 'svelte';
   
   //export
   export var compName;

    //variables - ni da buat Api baru tukar url dia
    var urlApi = "http://localhost:8080/contacts";
    var awGet;
    var resultGet;
    var usersData = [];
    var name;
    var email;
    var description;


    onMount(async()=>{
        debugger;
        awGet = await fetch(urlApi);
        resultGet = await awGet.json();
        if(resultGet.data !== undefined){
            usersData = resultGet.data;
        }
        debugger;

    });

    var refreshData = async() =>{
        awGet = await fetch(urlApi);
        resultGet = await awGet.json();
        if(resultGet.data !== undefined){
            usersData = resultGet.data;
        }
    }

    var insertData = async() =>{
        var data = {
            Name : name,
            Email: email,
            Description : description
        }
        debugger;
        var awPost = await fetch(urlApi + '/add-user/',{
            method:'POST',
            headers:{
                'Content-Type': 'application/json; charset=utf-8'
            },
            body: JSON.stringify(data)
        });
        debugger;

        var postRes = awPost.json();
        if(awPost.status == 200){
            refreshData();
            name = '';
            email = '';
            description = '';

        }
    }



</script>

<div class="container-fluid">
    <h3 class="text-center text-info">This is  {compName} assignment</h3>   
    <br>
    <h5 class="text-center text-info">Contact Form</h5>        
    <div class="col-4 offset-4"><br/>
        <div class="col-8">
            <div class="form-group">
                <div class="col-12">
                    <!-- svelte-ignore a11y-label-has-associated-control -->
                    <label>Name</label>
                    <input class="form-control" bind:value={name}/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12">
                    <!-- svelte-ignore a11y-label-has-associated-control -->
                    <label>Email</label>
                    <input class="form-control" bind:value={email}/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12">
                    <!-- svelte-ignore a11y-label-has-associated-control -->
                    <label>Description</label>
                    <input class="form-control" bind:value={description}/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12">
                    <button class="btn btn-info btn-sm" on:click={()=>{
                        insertData();
                    }}>Submit</button>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th># Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                {#each usersData as item, i}
                <tr>
                    <td>{i + 1}</td>
                    <td>{item.name}</td>
                    <td>{item.email}</td>
                    <td>{item.description}</td>
                </tr>
                {/each}
            </tbody>
        </table>

    </div>
</div>
