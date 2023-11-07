function prime()
{
    n=document.getElementById("prime_input").value;
    for(i=2;i<=(n/2);i++)
    {
        if(n%i==0)
        {
            document.getElementById("prime_ans").innerHTML="Composite";
            return;
        }
    }
    document.getElementById("prime_ans").innerHTML="Prime";
}

function odd()
{
    n=document.getElementById("odd_input").value;
    if(n%2==0)
    {
        document.getElementById("odd_ans").innerHTML="Even";
    }
    else
    {
        document.getElementById("odd_ans").innerHTML="Odd";
    }
}

function cp()
{
    n=document.getElementById("cp_input").value;
    document.getElementById("cp_ans").innerHTML=n*2*22/7;
}

function ca()
{
    n=document.getElementById("ca_input").value;
    document.getElementById("ca_ans").innerHTML=n*n*22/7;
}