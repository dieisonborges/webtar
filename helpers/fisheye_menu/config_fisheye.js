$(document).ready(
function()
{
$('#dock').Fisheye(
{
maxWidth: 50,
items: 'a',
itemsText: 'span',
container: '.dock-container',
itemWidth: 50,
proximity: 60,
halign : 'center'
}
)
$('#dock2').Fisheye(
{
maxWidth: 50,
items: 'a',
itemsText: 'span',
container: '.dock-container2',
itemWidth: 50,
proximity: 60,
alignment : 'left',
valign: 'bottom',
halign : 'center'
}
)
}
);