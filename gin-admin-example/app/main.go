package main

import (
	"gin-admin-example/core"
	"gin-admin-example/global"
	"gin-admin-example/initialize"
)

func main() {
	global.GAE_VP = core.Viper()
	global.GAE_LOG = core.Zap()
	global.GAE_DB = initialize.Gorm()
	initialize.MysqlTables(global.GAE_DB)
}
