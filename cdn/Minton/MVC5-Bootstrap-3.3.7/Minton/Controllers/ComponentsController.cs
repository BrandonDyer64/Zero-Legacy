using System.Web.Mvc;

namespace Milton.Controllers
{
    public class ComponentsController : Controller
    {
        public ViewResult Carousel()
        {
            return View();
        }

        public ViewResult Grid()
        {
            return View();
        }

        public ViewResult NestableList()
        {
            return View("nestable-list");
        }

        public ViewResult RangeSliders()
        {
            return View();
        }

        public ViewResult SweetAlert()
        {
            return View();
        }

        public ViewResult Widgets()
        {
            return View();
        }
    }
}