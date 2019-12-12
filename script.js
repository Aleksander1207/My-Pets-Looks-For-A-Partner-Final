function toggleSidebar()
{
    document.getElementById("sidebar").classList.toggle('active');
}
function showMenu()
{
    var toggle=document.getElementById("mobileMenu")
    if(toggle.style.height=="0")
    {
        toggle.style.height="200px";
    }
    else
    {
        toggle.style.height="0px";
    }
}
function openmenu()
{
    document.getElementById("side-menu").style.display="block";
    document.getElementById("menu-btn").style.display="none";
    document.getEllementById("close-btn").style.display="block";
}
function closemenu()
{
    document.getElementById("side-menu").style.display="none";
    document.getElementById("menu-btn").style.display="block";
    document.getEllementById("close-btn").style.display="none";
}