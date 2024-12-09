const members_container = document.querySelector('#members-container');

fetch('http://localhost:8000/api/members')
.then((response) => response.json())
.then((data) => {
    const members = data["hydra:member"];
    members.forEach(member => {
        let member_box = document.createElement('div');
        member_box.innerHTML = member.last.toUpperCase() + ' ' + member.first;
        members_container.appendChild(member_box);
    });
})