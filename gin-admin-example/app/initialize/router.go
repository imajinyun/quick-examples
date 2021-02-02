package initialize

import (
	"gin-admin-example/global"
	"gin-admin-example/middleware"
	"gin-admin-example/router"
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/swaggo/gin-swagger"
	"github.com/swaggo/gin-swagger/swaggerFiles"
)

// Routers initialize all routes.
func Routers() *gin.Engine {
	var Router = gin.Default()
	Router.StaticFS(global.GAE_CONFIG.Local.Path, http.Dir(global.GAE_CONFIG.Local.Path))
	global.GAE_LOG.Info("use middleware logger")

	Router.Use(middleware.Cors())
	global.GAE_LOG.Info("use middleware cors")

	Router.GET("/swagger/*any", ginSwagger.WrapHandler(swaggerFiles.Handler))
	global.GAE_LOG.Info("register swagger handler")

	PublicGroup := Router.Group("")
	{
		router.InitBaseRouter(PublicGroup)
	}
	PrivateGroup := Router.Group("")
	PrivateGroup.Use(middleware.JWTAuth()).Use(middleware.CasbinHandler())
	{
		router.InitAPIRouter(PrivateGroup)                   // 注册功能api路由
		router.InitJwtRouter(PrivateGroup)                   // jwt相关路由
		router.InitUserRouter(PrivateGroup)                  // 注册用户路由
		router.InitMenuRouter(PrivateGroup)                  // 注册menu路由
		router.InitEmailRouter(PrivateGroup)                 // 邮件相关路由
		router.InitSystemRouter(PrivateGroup)                // system相关路由
		router.InitCasbinRouter(PrivateGroup)                // 权限相关路由
		router.InitCustomerRouter(PrivateGroup)              // 客户路由
		router.InitAutoCodeRouter(PrivateGroup)              // 创建自动化代码
		router.InitAuthorityRouter(PrivateGroup)             // 注册角色路由
		router.InitSimpleUploaderRouter(PrivateGroup)        // 断点续传（插件版）
		router.InitSysDictionaryRouter(PrivateGroup)         // 字典管理
		router.InitSysOperationRecordRouter(PrivateGroup)    // 操作记录
		router.InitSysDictionaryDetailRouter(PrivateGroup)   // 字典详情管理
		router.InitFileUploadAndDownloadRouter(PrivateGroup) // 文件上传下载功能路由
		router.InitWorkflowProcessRouter(PrivateGroup)       // 工作流相关接口
	}
	global.GAE_LOG.Info("router register success")
	return Router
}
