using System.Web;
using System.Web.Optimization;

namespace Milton
{
    public class BundleConfig
    {
        // For more information on bundling, visit http://go.microsoft.com/fwlink/?LinkId=301862
        public static void RegisterBundles(BundleCollection bundles)
        {
            bundles.Add(new ScriptBundle("~/bundles/jquery").Include(
                        "~/Scripts/jquery.min.js"));

            bundles.Add(new ScriptBundle("~/bundles/jqueryval").Include(
                        "~/Scripts/jquery.validate*"));

            // Use the development version of Modernizr to develop with and learn from. Then, when you're
            // ready for production, use the build tool at http://modernizr.com to pick only the tests you need.
            bundles.Add(new ScriptBundle("~/bundles/modernizr").Include(
                        "~/Scripts/modernizr-*"));

            bundles.Add(new ScriptBundle("~/bundles/bootstrap").Include(
                      "~/Scripts/bootstrap.min.js"));

            bundles.Add(new StyleBundle("~/Content/css").Include(
                      "~/content/bootstrap.min.css",
                      "~/content/core.css",
                      "~/content/icons.css",
                      "~/content/components.css",
                      "~/content/pages.css",
                      "~/content/menu.css",
                      "~/content/responsive.css",
                      "~/plugins/switchery/switchery.min.css"));

            bundles.Add(new ScriptBundle("~/bundle/common").Include(
                    "~/Scripts/detect.js",
                    "~/Scripts/fastclick.js",
                    "~/Scripts/jquery.blockUI.js",
                    "~/Scripts/waves.js",
                    "~/Scripts/wow.min.js",
                    "~/Scripts/jquery.nicescroll.js",
                    "~/Scripts/jquery.scrollTo.min.js",
                    "~/plugins/switchery/switchery.min.js",
                    "~/Scripts/jquery.slimscroll.js"));

            bundles.Add(new ScriptBundle("~/bundle/core-app").Include(
                    "~/Scripts/jquery.core.js",
                    "~/Scripts/jquery.app.js"));
        }
    }
}