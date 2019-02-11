//var SidePanel = document.getElementById("sidePanel");
var SidePanelOpened = false;
function OpenSidePanel(SidePanel) {
    SidePanel.style.width = "300px";
    console.log(SidePanel.style.width);
    if(SidePanelOpened == true) {
        CloseSidePanel(SidePanel);
    }
    else{
        SidePanelOpened = true;
    }
}
function CloseSidePanel(SidePanel) {
    SidePanel.style.width = "0px";
    console.log(SidePanel.style.width);
    if(SidePanelOpened == false) {
        OpenSidePanel(SidePanel);
    }
    else{
        SidePanelOpened = false;
    }
}