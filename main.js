var SidePanel = document.getElementById("sidePanel");
function OpenSidePanel() {
    SidePanel.style.width = "300px";
    console.log(SidePanel.style.width);
}
function CloseSidePanel() {
    SidePanel.style.width = "0px";
    console.log(SidePanel.style.width);
}