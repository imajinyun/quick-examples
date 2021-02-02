package model

import (
	"gin-admin-example/global"
	"time"
)

type ExaWfLeave struct {
	global.GAE_MODEL
	Cause     string    `json:"cause" form:"cause" gorm:"column:cause;comment:"`
	StartTime time.Time `json:"startTime" form:"startTime" gorm:"column:start_time;comment:"`
	EndTime   time.Time `json:"endTime" form:"endTime" gorm:"column:end_time;comment:"`
}

type ExaWfLeaveWorkflow struct {
	WorkflowBase `json:"wf"`
	ExaWfLeave   `json:"business"`
}

func (ExaWfLeave) TableName() string {
	return "exa_wf_leaves"
}
