We used to do 1 on 1 in vanilla PHP MVC : 
for every class we'd generate a controller and a view.
In big projects this is unsustainable because you will have a metric fudgeload of controllers.
Now we will be looking more at entities and grouping logic : if we have a student entity, we make one controller
for everything student related and route to different pages/view in that one controller.
If we have multiple logic functions that center on name for example, we can also group that in one controller
(eg changename, setname, sayname,...)


what did we learn : routing via route.yalm : MAKE SURE TO CHANGE THE METHOD AT THE END TO THE ONE YOU WANNA ROUT TO!
DONT DOUBLE ROUT! I was routing in routes.yalm and using normal routing, only do one lol.
use built in tools like the ->createFormBuilder method in Symfony to make a form, dont just manually code it. We can check
if the request is a POST easier since we have a var $form now and can do some ifs etc...

Able to catch the requests in the form now. 