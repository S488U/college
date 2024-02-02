
let getApprove = localStorage.getItem("approvalStatus");

if (!getApprove) {
    console.log("Approval is pending");
    showElement("Approval is pending");
} else {
    console.log("200 OK");
}

function showElement(message) {
    let toast =  document.getElementById("toast");
    toast.style.display = "block";

    document.getElementById("close").addEventListener("click", () => {
        toast.style.display = "none";
    })

    document.getElementById("agree").addEventListener("click", () => {
        localStorage.setItem("approvalStatus", "Approved");
        window.location.href = '/agree';
        toast.style.display = "none";
    })
}
