var ft_list = document.getElementById('ft_list');

window.onunload = getCookies();

function getCookies()
{
	var cookies = document.cookie;
	if (cookies) {
		cookies = cookies.split(';');
		setPreviousTasks(cookies);
	}
}
function setCookie(id, task)
{
	document.cookie = id + '=' + task + '; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
}
function delTask(element, id)
{
	if (confirm('Did you really do it?')) {
		var toRemove = document.getElementById(id);
		document.cookie = id + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';
		toRemove.parentNode.removeChild(toRemove);
	}
}
function setPreviousTasks(cookies)
{
	for (var i = 0; i < cookies.length; i++) {
		task = cookies[i].split('=');
		add(task[1], task[0]);
	}
}
function add(task, id)
{
	var element = document.createElement('div');
	var toDo = document.createTextNode(task);
	element.id = id;
	element.className = 'listElement';
	element.appendChild(toDo);
	element.onclick = () => delTask(element, element.id);
	ft_list.insertBefore(element, ft_list.childNodes[0]);
}
function askTask()
{
	var newTask = prompt('What do you have to do?');
	if (newTask.includes(';') || newTask.includes('=')) {
		alert('Your task cannot contain \';\' or \'=\'');
	}
	else if (id = addTask(newTask)) {
		setCookie(id, newTask);
	}

}
function addTask(newTask)
{
	var newElement = document.createElement('div');
	if (newTask)
	{
		var toDo = document.createTextNode(newTask);
		newElement.id = 'div_' + new Date().getTime().toString();
		newElement.className = 'listElement';
		newElement.appendChild(toDo);
		newElement.onclick = () => delTask(newElement, newElement.id);
		ft_list.insertBefore(newElement, ft_list.childNodes[0]);
		return (newElement.id);
	}
}
